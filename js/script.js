function searchMovie(){
    $('#movie-list').html('');
    $.ajax({
        url:'http://www.omdbapi.com',
        type: 'get',
        dataType : 'json',
        data: {
            'apikey' : 'afe9924b',
            's' : $('#search-input').val()
        },
        success : function(result){
            if(result.Response == "True"){
                let movies = result.Search;
                $.each(movies, function(i, data){
                    $('#movie-list').append(`
                    <div class="col-md-4 my-2">
                        <div class="card">
                        <img src="`+ data.Poster+`" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">`+ data.Title+`</h5>
                            <h6 class="card-subtitle mb-2 text-muted">`+ data.Year+`</h6>
                            <a href="#" class="btn btn-primary see-detail" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id=`+ data.imdbID +`>See Detail</a>
                        </div>
                        </div>
                    </div>
                    `)
                })

                $('#search-input').val('');
            }else{
                $('#movie-list').html(`
                    <h1 class="text-center">`+ result.Error+`</h1>
                `)
            }
        }
    })
}


$('#search-button').on('click', function(){
    searchMovie();
})

$('#search-input').on('keyup', function(event){
    if(event.keyCode === 13){
        searchMovie();
    }
})

$('#movie-list').on('click','.see-detail',function(){
    $.ajax({
        url: 'http://omdbapi.com',
        dataType: 'json',
        type : 'get',
        data:{
            'apikey' : 'afe9924b',
            'i': $(this).data('id')
        },
        success : function (movie){
            console.log()
            if(movie.Response === "True"){
                $('.modal-body').html(`
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-4">
                                <img class="img-fluid" src="`+ movie.Poster +`">
                            </div>
                            <div class="col-8">
                                <ul class="list-group">
                                    <li class="list-group-item disabled" aria-disabled="true"><h3>`+ movie.Title +`</h3></li>
                                    <li class="list-group-item">Released : `+ movie.Year +`</li>
                                    <li class="list-group-item">Genre : `+ movie.Genre +`</li>
                                    <li class="list-group-item">Director : `+ movie.Director +`</li>
                                    <li class="list-group-item">Actor : `+ movie.Actors +`</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                `)
            }
        }
    })
})


