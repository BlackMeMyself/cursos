function toggle_selected_menu(id) {
    document.getElementById("index_btn").classList.remove("activo");
    document.getElementById("login_btn").classList.remove("activo");
    document.getElementById("signup_btn").classList.remove("activo");

    document.getElementById(id).classList.add("activo");
}