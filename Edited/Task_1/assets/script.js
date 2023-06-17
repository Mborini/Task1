setTimeout(function() {
    document.getElementById("myDiv").style.display = "none";
}, 2000);
function previewProfilePicture(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var previewImg = document.getElementById('profile-picture-preview-img');
        previewImg.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}