    var todo_titles = document.querySelectorAll('.todo-title');
    var todo_title_text;
    var todo_checked;
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
                url: 'todo-processing.php',
                type: 'POST',
                cache: false,
                data: {'todo_title': todo_title_text, 'todo_checked' : todo_checked},
                dataType: 'html'
            });
        i++;
    })

    
/*function addTodoItem(event) {

    event.preventDefault();

    if (addInput.value === '') {
        return alert('Необходимо ввести название задачи.');
    }

    const todoItem = createTodoItem(addInput.value);
    todoList.appendChild(todoItem);
    addInput.value = '';
}*/