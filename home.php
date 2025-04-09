<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الطلاب</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <?php
         $host='localhost'
         $user='root'
         $pass=''
         $db='etuidents'
         $conn=mysqli_connet($host, $user, $pass,$db );
         $res=mysqli_query($conn,)
         $id=''
         $nome=''
         $class=''
    ?>

    <div class="container py-5">
        <div class="row">
            <!-- Form Section (Left) -->
            <div class="col-md-5">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <img src="img/home.php" alt="Logo" class="img-fluid mb-2" style="width: 50px;">
                        <h3>تسجيل الطلاب</h3>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label for="id" class="form-label">Id</label>
                                <input type="text" id="id" name="id" class="form-control" placeholder="أدخل الرقم التسلسلي">
                            </div>

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nom & Prénom</label>
                                <input type="text" id="nome" name="nome" class="form-control" placeholder="أدخل اسم الطالب">
                            </div>

                            <div class="mb-3">
                                <label for="class" class="form-label">Classe</label>
                                <input type="text" id="class" name="class" class="form-control" placeholder="أدخل القسم">
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="submit" name="Add" id="Add" class="btn btn-success">
                                    إضافه طالب
                                </button>
                                <button type="button" name="del" id="del" class="btn btn-danger">
                                    حذف طالب
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Table Section (Right) -->
            <div class="col-md-7">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white text-center">
                        قائمة الطلاب
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-bordered table-striped table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">الرقم التسلسلي</th>
                                    <th scope="col">إسم الطالب</th>
                                    <th scope="col">قسم الطالب</th>
                                </tr>
                            </thead>
                            <tbody id="tbl">
                                <!-- الصفوف ستُملأ هنا -->
                                <!-- مثال -->
                                <!--
                                <tr>
                                    <td>1</td>
                                    <td>محمد أحمد</td>
                                    <td>علوم</td>
                                </tr>
                                -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS Bundle (اختياري) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
