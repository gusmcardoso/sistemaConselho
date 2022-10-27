        </div>
        <script>
            var search = document.getElementById('pesquisar');
            search.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    searchData();
                }
            });


            function searchData() {
                window.location = 'listar.php?search=' + search.value;
            }
        </script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https:////cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    </body>
</html>
