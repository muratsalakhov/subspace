$("#todo-add-button").on("click", function(){
    var todo_add_input = $("#todo-add-input").val().trim();

    if (todo_add_input == '') {
        return alert('Необходимо ввести название задачи.');
    }

    $.ajax({
        url: 'todo-processing.php',
        type: 'POST',
        cache: false,
        data: {'add-input': todo_add_input},
        dataType: 'html',
        beforeSend: function(){
            $("#todo-add-button").prop("disabled", true);
        },
        success: function(data){
            //alert(data);
            $("#todo-add-button").prop("disabled", false);
        }
    });

    const todoItem = createTodoItem(todoAddInput.value);
    todoList.appendChild(todoItem);
    todoAddInput.value = '';
});



function todoCreateElement(tag, props, ...children) {
    const todoElement = document.createElement(tag);

    Object.keys(props).forEach(key => todoElement[key] = props[key]);

    if (children.length > 0) {
        children.forEach(child => {
            if (typeof child === 'string') {
                child = document.createTextNode(child);
            }

            todoElement.appendChild(child);
        });
    }

    return todoElement;
}

function createTodoItem(title) {
    const todoCheckbox = todoCreateElement('input', { type: 'checkbox', className: 'checkbox todo-checkbox' });
    const todoLabel = todoCreateElement('label', { className: 'title todo-title' }, title);
    const todoEditInput = todoCreateElement('input', { type: 'text', className: 'textfield', autocomplete: 'off' });
    let todoEditButton = todoCreateElement('button', { type: 'button', className: 'edit button' });
    todoEditButton.innerHTML = '<i class="fas fa-edit"></i>';
    let todoDeleteButton = todoCreateElement('button', { type: 'button', className: 'delete button' });
    todoDeleteButton.innerHTML = '<i class="fas fa-trash-alt"></i>';
    const todoListItem = todoCreateElement('form', { className: 'todo-item' }, todoCheckbox, todoLabel, todoEditInput, todoEditButton, todoDeleteButton);

    todoBindEvents(todoListItem);

    return todoListItem;
}

function todoBindEvents(todoItem) {
    const todoCheckbox = todoItem.querySelector('.checkbox');
    const todoEditButton = todoItem.querySelector('button.edit');
    const todoDeleteButton = todoItem.querySelector('button.delete');

    todoCheckbox.addEventListener('change', checkTodoItem);
    todoEditButton.addEventListener('click', editTodoItem);
    todoDeleteButton.addEventListener('click', deleteTodoItem);
}


function checkTodoItem() {
    const todoListItem = this.parentNode;
    const todoTitle = todoListItem.querySelector('.todo-title');
    const todoCheckbox = todoListItem.querySelector('.todo-checkbox');
    var checkbox_status;

    if (checkbox.checked) {
        checkbox_status = 1;
    } else {
        checkbox_status = 0;
    }

    $.ajax({
        url: 'todo-processing.php',
        type: 'POST',
        cache: false,
        data: {'todo_title': todoTitle.innerText, 'todo_checked' : checkbox_status},
        dataType: 'html'
    });

    todoListItem.classList.toggle('completed');
}

function editTodoItem() {
    const todoListItem = this.parentNode;
    const todoTitle = todoListItem.querySelector('.title');
    const todoEditInput = todoListItem.querySelector('.textfield');
    const todoIsEditing = todoListItem.classList.contains('editing');

    if (todoIsEditing) {
        $.ajax({
            url: 'todo-processing.php',
            type: 'POST',
            cache: false,
            data: {'todo_input': todoEditInput.value, 'todo_title': todoTitle.innerText},
            dataType: 'html'
        });
        todoTitle.innerText = todoEditInput.value;
        this.innerHTML = '<i class="fas fa-edit"></i>';

    } else {
        todoEditInput.value = todoTitle.innerText;
        this.innerHTML = '<i class="fas fa-check"></i>';
    }

    todoListItem.classList.toggle('editing');
}

function deleteTodoItem() {
    const todoListItem = this.parentNode;
    const todoTitle = todoListItem.querySelector('.title');
    $.ajax({
        url: 'todo-processing.php',
        type: 'POST',
        cache: false,
        data: {'todo_delete': todoTitle.innerText},
        dataType: 'html'
    });
    todoList.removeChild(todoListItem);
}

const todoForm = document.getElementById('todo-form');
const todoAddInput = document.getElementById('todo-add-input');
const todoList = document.getElementById('todo-list');
const todoItems = document.querySelectorAll('.todo-item');

function main() {

    //todoForm.addEventListener('submit', addTodoItem);
    todoItems.forEach(item => todoBindEvents(item));
}

main();

