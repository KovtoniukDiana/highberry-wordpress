
$(document).ready(function() {
    let openMenu = $(".opened-menu");
    let menuButton = $(".menu-img");
    let menu = $(".menu");
    let li = $(".li-item");
    let closeMenu = $(".close-menu");

    menuButton.click(function() {
        openMenu.addClass("open");
        menu.addClass("open");

        li.each(function(index) {
            let item = $(this);
            setTimeout(() => item.addClass("open"), index * 100);
        });
    });

    closeMenu.click(function() {
        openMenu.removeClass("open");
        menu.removeClass("open");
        li.removeClass("open");
    });


    $(".can-open").click(function(event) {
        event.preventDefault();

        let submenu = $(this).closest(".li-item").find(".submenu");

        $(".submenu").not(submenu).slideUp(300);

        submenu.slideToggle(300);
    });
});
