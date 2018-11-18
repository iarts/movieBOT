$(document).ready(() => {
  $('#searchForm').on('submit', (e) => {
    let searchText = $('#searchText').val();
    getMovies(searchText);
    e.preventDefault();
  });
});

function getMovies(searchText) {
    axios.get(`https://www.omdbapi.com/?s=${searchText}&apikey=34b63443`)
    .then((response) => {
     console.log(response);
let movies = response.data.Search;
let output = '';
$.each(movies, (index, movie) => {
output += `
<div class="col-md-3">
<div class="well text-center">
<img src="${movie.Poster}">
<h5>${movie.Title}</h5>
<a onclick="movieSelected('${movie.imdbID}')" class="btn btn-primary" href="#">Λεπτομέρειες ταινίας</a>
</br></br>
<p>Παρακαλώ Επιλέψτε Για Την Αποθήκευση Της Ταινίας</p>
Επιλογή: <input type="checkbox" class="get_value" value="movie">

<h4 id="result"></h4>
 <script>
  $(document).ready(function(){
    $('#submit').click(function(){
     var insert = [];
      $('.get_value').each(function(){
       if($(this).is(":checked"))
        {
         insert.push($(this).val());
       }
    });
         insert = insert.toString();
          $.ajax({
           url: "insert.php",
            method: "POST",
             data:{insert:insert},
              success:function(data){
               $('#result').html(data);
             }
          });
       });
    });
  </script>
</div>
</div>
`;
});

$('#movies').html(output);
  })
   .catch((err) => {
    console.log(err);
  });
}

function movieSelected(id){
sessionStorage.setItem('movieId',id);
window.location = 'movie.html'
return false;
}

function getMovie(){
let movieId = sessionStorage.getItem('movieId');

axios.get(`https://www.omdbapi.com/?i=${movieId}&apikey=34b63443`)
    .then((response) => {
     console.log(response);
let movie = response.data;

let output =`
<div class="row">
<div class="col-md-4">
<img src="${movie.Poster}" class="thumbnail">

</div>
<div class="col-md-8">
<h2>${movie.Title}</h2>
<ul class="list-group">
<li class="list-group-item"><strong>Είδος:</strong> ${movie.Genre}</li>
<li class="list-group-item"><strong>Κυκλοφόρησε:</strong> ${movie.Released}</li>
<li class="list-group-item"><strong>Βαθμολογήθηκε:</strong> ${movie.Rated}</li>
<li class="list-group-item"><strong>Συγγραφείς:</strong> ${movie.Writer}</li>
<li class="list-group-item"><strong>Σκηνοθέτης:</strong> ${movie.Director}</li>
<li class="list-group-item"><strong>Ηθοποιοί:</strong> ${movie.Actors}</li>
<li class="list-group-item"><strong>Διάρκεια:</strong> ${movie.Runtime}</li>
</ul>
</div>
</div>
<div class="row">
<div class="well">
<h3>Περίληψη</h3>
${movie.Plot}
<hr>
<a href="https://www.imdb.com/title/${movie.imdbID}/" target="_blank" class="btn btn-primary">Προβολή IMDB</a>
<a href="index.html" class="btn btn-default">Επιστροφή στην αναζήτηση</a>
`;


$('#movie').html(output);
  })
   .catch((err) => {
    console.log(err);
  });
}
