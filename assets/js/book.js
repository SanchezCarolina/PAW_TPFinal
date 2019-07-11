var search,
    select,
    result;

function bookSearch(){
    search = document.getElementById('search').value;
    result = document.getElementById('buscarLibroCargar');
    console.log(search);

    $.ajax({
        url: "https://www.googleapis.com/books/v1/volumes?q=" + search,
        dataType: "json",

        success: function (data) {
            //console.log(data);
            var miSelect = document.getElementById("miSelect");
            for (i = 0; i < data.items.length; i++) {
                var miOption = document.createElement("option");
                miOption.setAttribute("value", i);
                miOption.setAttribute("label", data.items[i].volumeInfo.title + " -" + data.items[i].volumeInfo.authors);
                miSelect.appendChild(miOption);
            }
            result.appendChild(miSelect);
            //console.log(data)
        },
        type: "GET"
    });
}

function elegir(){
  select = document.getElementById("miSelect").value;
  console.log(select);
 
 $.ajax({
        url: "https://www.googleapis.com/books/v1/volumes?q="+search,
        dataType: "json",
     
        success: function(data){
            console.log(data.items[select].volumeInfo.title);
            document.getElementById("isbn").value = data.items[select].volumeInfo.industryIdentifiers[0].identifier;
            document.getElementById("titulo").value = data.items[select].volumeInfo.title;
            document.getElementById("autor").value = data.items[select].volumeInfo.authors;
            document.getElementById("genero").value = data.items[select].volumeInfo.categories;
            document.getElementById("portadaForm").value = data.items[select].volumeInfo.imageLinks.thumbnail;
            document.getElementById("resenia").value = data.items[select].volumeInfo.description;
        },
        
        type: "GET"
    });   
}

document.getElementById('button').addEventListener('click', bookSearch, false)

