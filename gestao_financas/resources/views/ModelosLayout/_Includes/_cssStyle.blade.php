<style>
    /* ------------ Estilos Gerias ------------ */
    body, html {
        width: 100%;
        height: 100%;
    }

    /* ------------ Estilo body ------------ */
    body {
        background-color: #d5d5d5;
    }
    /* -------------------------------------*/

    /* ------------ Login ------------*/
    .boxLogin {
        background-color: #ffffff;
        text-align: center;
     
    }
    .boxPassword div a {
        font-size: 14px;
        border-radius: 2px;
        padding: 0.3rem 2.1rem;
        width: 100%
    }

    .boxLogin form {
        padding: 1rem 5rem;
    }

    .welcomeText p{
        margin: 0.3rem 0;
        padding: 0;
    }

    .welcomeText h4{
        margin-bottom:1rem;
    }

    .welcomeText{
        padding: 0.5rem;
    }
    /* -------------------------------------*/


    /* --------Menu ------ */
.sidebar {
    width: 250px;
    background-color: #333;
    color: #fff;
    height: 100vh;
    padding: 20px;
    position: fixed;
    top: 0;
    left: 0;
    transition: width 0.3s ease;
    position: fixed;
    /* z-index: 1000; Garante que a sidebar fique acima de outros elementos */
}

.sidebar.collapsed {
    width: 60px;
    padding: 10px;
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 30px;
    transition: opacity 0.3s ease;
}

.sidebar.collapsed h2 {
    opacity: 0;
}

.sidebar ul {
    list-style-type: none;
}

.sidebar ul li {
    margin: 20px 0;
}

.sidebar ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    display: block;
    transition: opacity 0.3s ease;
}

.sidebar ul li a:hover {
    background-color: #575757;
    padding: 10px;
    border-radius: 4px;
}

.sidebar.collapsed ul li a {
    font-size: 0;
    padding: 10px;
}

.toggle-btn {
    background-color: #333;
    border: none;
    color: #fff;
    font-size: 24px;
    cursor: pointer;
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 1001; Garante que o botão fique acima da sidebar
    transition: all 0.3s ease;
}

.sidebar.collapsed .toggle-btn {
    font-size: 20px;
}

.sidebar h2,
.sidebar ul li a,
.sidebar ul li form button,
.sidebar hr {
    transition: opacity 0.3s ease, visibility 0.3s ease;
}

.sidebar.collapsed h2,
.sidebar.collapsed ul li a,
.sidebar.collapsed ul li form button,
.sidebar.collapsed hr {
    opacity: 0;
    visibility: hidden;
}

/* Ajustar o conteúdo para o lado da sidebar */
.content {
    margin-left: 300px; /* Alinhar ao lado da sidebar */
    transition: margin-left 0.3s ease;
}

/* Quando a sidebar estiver colapsada, o conteúdo se ajusta */
.sidebar.collapsed ~ .content {
    margin-left: 100px;
}


/*--------- Perfil ------- */

#userPhoto{
    width: 150px; 
    height: 150px; 
    object-fit: cover;
}

  


</style>