<style>
    /* ------------ Estilos Gerias ------------ */
    body, html {
        width: 100%;
        height: 100%;
        overflow-x: hidden; /* Esconde o scroll horizontal */
    }

    hr{
        height: 3px;
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

    .boxLogin form .contentForm {
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
    background-color: #f8f8f8;
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

.sidebar.collapsed h2, .sidebar.collapsed img, .sidebar.collapsed .defautPhoto, .sidebar.collapsed li {
    opacity: 0;
}

.sidebar ul {
    list-style-type: none;
}

.sidebar ul li {
    margin: 1rem 0;
}

.sidebar ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    display: block;
    transition: opacity 1s ease;
    padding: 0.1rem
}

.sidebar ul li a:hover {
    background-color: #eeeeee;
    /* padding: 10px; */
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
    margin-left: 17rem; /* Alinhar ao lado da sidebar */
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

/* ----- Titulo ------ */

.titlePage {
    margin: 2rem 2rem;
    border: #999999 1px solid;

}

.titlePage h1{
    font-size: 3.7rem;
}

/* ----- Cards Home ---- */

#boxCards {
        padding: 1rem 0rem; /* Ajuste o padding conforme necessário */
}

.cardContentText{
    width: 25.5rem;
    border: #999999 1px solid;
}

.cardGraphics{
    border: #999999 1px solid;
}

/* ---- Filter Home Page --- */
.boxFilter{

    width: 93%;
    border: #999999 1px solid;
}

.cardBodyFilter{
    transition: max-height 0.5s ease, padding 0.5s ease; /* Ajuste o tempo para coincidir */
    padding: 0 1rem; /* Padding inicial */
    overflow: hidden; /* Garante que o conteúdo não transborde inicialmente */
}

#filterHeader{
    cursor: pointer;
}




/* ------ Caixas projetos ---------*/
.carousel-item {
    transition: transform 0.5s ease;
}

.card {
    margin: 0 auto; /* Centraliza o card */
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    /* color: #000000; Cor do ícone do controle */
    border-radius: 50%; /* Faz os ícones ficarem redondos */
}

.boxTextResumeProject{
    border: 1px solid #c7c7c7;
    border-radius: 6px;
    margin: 0.1rem 4rem;
    padding: 0.3rem;
    /* box-shadow: 5px 2px 17px -4px; */
}

.bgc-revenue{
    background-color: rgb(147, 196, 125);
    color: #000;
}

.bgc-expense{
    background-color: rgb(255 0 0 / 32%);
    color: #000;
}

.bgc-balance{
    background-color: rgb(109, 158, 235);
    color: #fff;
}

.bgc-description-project{
    background-color: rgb(238, 238, 238);
    color: #000;
}

.cardProject{
    border-radius: 15px;
    box-shadow: 0px 4px 13px #000000;
}


/* ------------Tabelas -----------*/

.cardTable {
    margin: 5rem 3.5rem !important;
    border: #999999 1px solid;
}

</style>