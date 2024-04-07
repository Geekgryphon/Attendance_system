function toggleVisibility(element) {
    var element = document.getElementById(element);

    if (element.classList.contains("visible")) {
        element.classList.remove("visible");
        element.classList.add("hidden"); // 添加隐藏类
    } else {
        element.classList.remove("hidden");
        element.classList.add("visible"); // 添加可见类
    }
}

function focusSelectedSubmenuButton(IdName){
    var elements = document.querySelectorAll('.submenu_button');
    var IdName = document.getElementById(IdName);

    elements.forEach(function(element) {
        element.classList.remove('selected_submenu_button');
    });

    IdName.classList.add("selected_submenu_button");
}