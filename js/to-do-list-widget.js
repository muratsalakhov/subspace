
function createElement(tag, props, ...children) {
    const element = document.createElement(tag);

    Object.keys(props).forEach(key => element[key] = props[key]);

    if (children.length > 0) {
        children.forEach(child => {
            if (typeof child === 'string') {
                child = document.createTextNode(child);
            }

            element.appendChild(child);
        });
    }

    return element;
}

function createTodoItem(title) {
    const checkbox = createElement('input', { type: 'checkbox', className: 'checkbox' });
    const label = createElement('label', { className: 'title' }, title);
    const editInput = createElement('input', { type: 'text', className: 'textfield' });
    let editButton = createElement('button', { className: 'edit button' });
    editButton.innerHTML = '<i class="fas fa-edit"></i>';
    let deleteButton = createElement('button', { className: 'delete button' });
    deleteButton.innerHTML = '<i class="fas fa-trash-alt"></i>';
    const listItem = createElement('li', { className: 'todo-item' }, checkbox, label, editInput, editButton, deleteButton);

    bindEvents(listItem);

    return listItem;
}

function bindEvents(todoItem) {
    const checkbox = todoItem.querySelector('.checkbox');
    const editButton = todoItem.querySelector('button.edit');
    const deleteButton = todoItem.querySelector('button.delete');

    checkbox.addEventListener('change', toggleTodoItem);
    editButton.addEventListener('click', editTodoItem);
    deleteButton.addEventListener('click', deleteTodoItem);
}

/*function addTodoItem(event) {

    event.preventDefault();

    if (addInput.value === '') {
        return alert('Необходимо ввести название задачи.');
    }

    const todoItem = createTodoItem(addInput.value);
    todoList.appendChild(todoItem);
    addInput.value = '';
}*/

function toggleTodoItem() {
    const listItem = this.parentNode;
    listItem.classList.toggle('completed');
}

function editTodoItem() {
    const listItem = this.parentNode;
    const title = listItem.querySelector('.title');
    const editInput = listItem.querySelector('.textfield');
    const isEditing = listItem.classList.contains('editing');

    if (isEditing) {
        title.innerText = editInput.value;
        this.innerHTML = '<i class="fas fa-edit"></i>';
    } else {
        editInput.value = title.innerText;
        this.innerHTML = '<i class="fas fa-check"></i>';
    }

    listItem.classList.toggle('editing');
}

function deleteTodoItem() {
    const listItem = this.parentNode;
    todoList.removeChild(listItem);
}

const todoForm = document.getElementById('todo-form');
const addInput = document.getElementById('add-input');
const todoList = document.getElementById('todo-list');
const todoItems = document.querySelectorAll('.todo-item');

function main() {

    //todoForm.addEventListener('submit', addTodoItem);
    todoItems.forEach(item => bindEvents(item));
}

main();

$("#add-button").on("click", function(){
    var add_input = $("#add-input").val().trim();

    if (add_input == '') {
        return alert('Необходимо ввести название задачи.');
    }

    $.ajax({
        url: 'processing.php',
        type: 'POST',
        cache: false,
        data: {'add-input': add_input},
        dataType: 'html',
        beforeSend: function(){
            $("#add-button").prop("disabled", true);
        },
        success: function(data){
            //alert(data);
            $("#add-button").prop("disabled", false);
        }
    });

    const todoItem = createTodoItem(addInput.value);
    todoList.appendChild(todoItem);
    addInput.value = '';
});

$(".todo-checkbox").on("click", function(){
    var todo_titles = document.querySelectorAll('.todo-title');
    var todo_title_text;
    var todo_checked;
    // alert(todo_titles);
    var todo_checkboxes = document.querySelectorAll('.todo-checkbox');
    var checked_set = new Set();
    var i = 0;

    todo_checkboxes.forEach(function(todo_checkbox){
        if (todo_checkbox.checked) {
            checked_set.add(i);
        } else {
            checked_set.delete(i);
        }
        i++;
    })

    i = 0;
    todo_titles.forEach(function(todo_title){
        todo_checked = 0;
        if (checked_set.has(i)) {
                todo_checked = 1;
        }
        todo_title_text = todo_title.innerHTML;
            $.ajax({
                url: 'processing.php',
                type: 'POST',
                cache: false,
                data: {'todo_title': todo_title_text, 'todo_checked' : todo_checked},
                dataType: 'html'
            });
        i++;
    })

    

    //for (let todo_title of todo_titles.values()) alert(todo_title);
    //var label = todo_title.innerHTML()


});