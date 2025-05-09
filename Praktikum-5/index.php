<!DOCTYPE html>
<html>
    <head>
        <title>Pinjam Online</title>
        <style>
            body {
                font-family: sans-serif;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background: linear-gradient(to right, #e2e2e2, #c9d6ff);
                color: #333;
            }
            .container {
                margin: 0 15px;
            }
            .form-box {
                width: 100%;
                max-width: 450px;
                padding: 50px;
                background: #ffff;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            h2 {
                font-size: 50px;
                text-align: center;
            }
            button{
                width: 100%;
                padding: 20px;
                background: #7494ec;
                border-radius: 6px;
                border: none;
                cursor: pointer;
                font-size: 20px;
                color: #fff;
                font-weight: 500;
                margin-bottom: 20px;
                transition: 0.5s;
            }
            button:hover{
                background: #6884d3;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="form-box">
                <form>
                    <h2>Pinjam Online</h2>
                    <button type="button" name="member" onclick="location.href='Member.php'">Member</button>
                    <button type="button" name="buku" onclick="location.href='Buku.php'">Buku</button>
                    <button type="button" name="peminjaman" onclick="location.href='Peminjaman.php'">Peminjaman</button>
                </form>
            </div>
        </div>
    </body>
</html>