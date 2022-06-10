<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>DearMe</title>
    </head>

    <body>
        <header class="py-2">
            <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color:#598392;">
                <div class="container-fluid px-4">
                    <a class="navbar-brand blog-header-logo text-white fs-3 fw-bolder" href="index.html">DearMe?</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item"><a class="nav-link fw-bolder active" href="diary.php" style="font-size: medium; color: #598392;">Diary</a></li>
                    <li class="nav-item"><a class="nav-link" href="wishlist.php" style="font-size: medium; color: white;">Wish List</a></li>
                    <li class="nav-item"><a class="nav-link" href="todolist.php" style="font-size: medium; color: white;">To Do List</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.html" style="font-size: medium; color: white;">Keluar</a></li>
                    </ul>
                    <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Cari...">
                    </form>
                </div>
                </div>
            </nav> 
        </header>

        <main class="px-3 py-5">
            <div class="p-3 my-3 text-dark rounded shadow-sm py-2">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-auto">
                        <h1 class="h6 mb-0 text-dark">Ingin Menambah Cerita Hari ini?</h1>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-secondary me-md-3" href="formDiary.php" style="background-color: #598392;"><span><i class="bi bi-bookmark-plus-fill text-light"></i></span> Tambahkan</a>
                    </div>         
                </div>
            </div>

            <div class="d-flex align-items-center p-3 my-3 text-dark rounded shadow-sm">
                <div class="d-flex align-items-center">                
                    <select class="form-select" aria-label="">
                        <option selected>Pilih Kategori</option>
                        <option value="1">Bahagia</option>
                        <option value="2">Marah</option>
                        <option value="3">Sedih</option>
                    </select>
                </div>
            </div>            
            <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">Catatan Tersimpan</h6>

            <?php
                include "config.php";
                $query = "SELECT * FROM diary ORDER BY tanggal DESC;";
                $sql = $db->query($query);
                $data = [];
        
                while ($row = $sql->fetch_assoc()):
                ?>

                <div class="d-flex text-muted pt-3">
                <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
            
                    <p class="pb-3 text-dark small lh-sm border-bottom">
                    <strong class="d-block text-gray-dark"><?= $row['tanggal']?></strong>
                    <?= $row['judul']?>         
                    </p>                
                </div>
                <?php endwhile ; ?>

            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center mt-3">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
                </ul>
            </nav>
        </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="offcanvas.js"></script>
    <script>
        $(document).on('click','#btn-add',function(e) {
		var data = $("#user_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "backend/save.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#addEmployeeModal').modal('hide');
						alert('Data added successfully !'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
    </script>
  </body>
</html>