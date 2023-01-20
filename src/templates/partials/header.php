<header>
    <div>
   <h1 class="pres">Une banque pas dans src, donc de confiance.</h1>
</div>
   <div class="button">
   <button href="register.php">INSCRIPTION</button>
   <button href="login.php">CONNEXION</button>
</div>
</header>

<style>
    .lien {
        font-size : 100%;
    }
    body{
        margin: 0;
        padding: 0;
        background-color: #325056;
        font-family: 'Helvetica', serif;
    }

    nav{
        display: flex;
        flex-direction: row;
        justify-content: right;
        color: white;
        width: 100%;
        padding-top: 15px;
    }

    .p{
        text-align: center;
        padding-bottom: 150px;
        padding-top: 10px;
    }

    header{
        background: linear-gradient();
        color: white;
        min-height: 500px;
    }

    .pres{
        text-align: center;
        margin-top: 18%;
        text-transform: uppercase;
    }

    h1{
        justify-content : flex-start;
    }

    .ul {
        list-style-type: none;
        display: flex;
        flex-direction: row;
        justify-content : left;

    }

    .s{
        display: flex;
        justify-content: flex-start;
    }

    .h{
        display: flex;
        flex-direction: row;
        justify-content: right;
    }

    li{
        padding-right: 50px;
        display:flex;
        flex-direction: row;
        text-decoration: none;
        color: white;
        font-size: 11px;


    }

    li a{
        text-decoration: none;
        color: white;
        font-size: 100%;
    }


    section{
        height: 900px;
        background: linear-gradient(0deg, #112D52ff, #10284Bff, #0F2244ff, #0E1D3Eff, #0D1737ff, #0C1230ff, #0B0C29ff);
    }

    .button{
        display: flex;
        flex-direction: row;
        justify-content: center;
        padding-bottom: 30px;
    }

    button{
        background-color: #325056;
        color: white;
        padding: 20px;
        padding-left: 40px;
        padding-right: 40px;
        margin: 20px;
        border-radius: 20px;

    }
</style>