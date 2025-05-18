window.addEventListener('beforeunload', function () {
    navigator.sendBeacon('../controller/controllerLogout.php');
});