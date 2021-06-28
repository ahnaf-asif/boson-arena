$('#description_en').trumbowyg({
    // btns: ['upload'],
    btnsDef: {
        // Create a new dropdown
        image: {
            dropdown: ['insertImage', 'upload'],
            ico: 'insertImage'
        }
    },
    btns: [
        ['viewHTML'],
        ['formatting'],
        ['strong', 'em', 'del'],
        ['superscript', 'subscript'],
        ['link'],
        ['image'], // Our fresh created dropdown
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']
    ],
    plugins: {
        resizimg: {
            minSize: 64,
            step: 16,
        },
        upload: {
            serverPath: 'https://api.imgur.com/3/image',
            fileFieldName: 'image',
            headers: {
                'Authorization': 'Client-ID 188d8dd42673a9d'
            },
            urlPropertyName: 'data.link'
        }
    }
});


$('#description_bn').trumbowyg({
    // btns: ['upload'],
    btnsDef: {
        // Create a new dropdown
        image: {
            dropdown: ['insertImage', 'upload'],
            ico: 'insertImage'
        }
    },
    btns: [
        ['viewHTML'],
        ['formatting'],
        ['strong', 'em', 'del'],
        ['superscript', 'subscript'],
        ['link'],
        ['image'], // Our fresh created dropdown
        ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
        ['unorderedList', 'orderedList'],
        ['horizontalRule'],
        ['removeformat'],
        ['fullscreen']
    ],
    plugins: {
        resizimg: {
            minSize: 64,
            step: 16,
        },
        upload: {
            serverPath: 'https://api.imgur.com/3/image',
            fileFieldName: 'image',
            headers: {
                'Authorization': 'Client-ID 188d8dd42673a9d'
            },
            urlPropertyName: 'data.link'
        }
    }
});

function checkCurrentLang(){
    if(document.getElementById('select_lang').value === 'en'){
        document.getElementById('description_bn_show').style.display='none';
        document.getElementById('description_en_show').style.display='block';
    }
    if(document.getElementById('select_lang').value === 'bn'){
        document.getElementById('description_bn_show').style.display='block';
        document.getElementById('description_en_show').style.display='none';
    }
}
