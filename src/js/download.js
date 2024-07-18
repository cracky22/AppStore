function download(app_id) {
    var download_url = "https://cracky.ddns.net/services/store/download.php?id=" + app_id
    setTimeout(() => {
        window.location.href = download_url;
    }, 200);
}