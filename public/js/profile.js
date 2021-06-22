$(document).ready(function(){
    $("#profilePictureInput").change(function(ev){
        const formData = new FormData();
        formData.append("image",ev.target.files[0]);
        fetch("https://api.imgur.com/3/image", {
            method: "post",
            headers: {
                Authorization: "Client-ID 188d8dd42673a9d"
            }
            ,body: formData
        }).then(data=>data.json()).then(data=>{
            if(document.getElementById('profilePictureInput').value.length){

                document.getElementById('profilePicturesubmitBtn').disabled = false;
                document.getElementById('profilePicturePreview').style.display = 'block';
                document.getElementById('profilePicturePreviewImg').src = data.data.link;
            }
            else{
                document.getElementById('profilePicturesubmitBtn').style.disabled = true;
                document.getElementById('profilePicturePreview').display = 'none';
            }
            document.getElementById('profilePictureLink').value = data.data.link;

        })
    });
});
