document.getElementById('searchField').addEventListener('input', function(event) {
    let search = event.target.value
    fetch('/autocomplete?search=' + search)
        .then(response => response.json())
        .then(function(data){
            console.log(data);
            let list = "";
            for (const item of data) {
                list += `<li><a href='/books/${item.id}'>${item.title}</a></li>`
            }
            document.getElementById('autocomplete').innerHTML = list;
        })
});
