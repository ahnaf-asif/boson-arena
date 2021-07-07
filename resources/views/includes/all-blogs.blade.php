<div class="all-blogs">
    <ul class="list-group">
        @for($i = 0; $i <= 5;$i++)
            <li class="list-group-item blog-list-item my-2">
                <h2 class="font-weight-bold">Blog Heading</h2>
                <p class="text-muted mb-5"><small style="font-size: 13px;">Ahnaf Shahriar Asif, 22-04-2020 8:19 pm</small></p>
                <div class="mb-5 blog-texts">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto aut maiores vel! Aliquam cum deleniti, dolore doloribus ducimus expedita maxime molestiae molestias numquam temporibus ullam unde veritatis vitae voluptatibus voluptatum.
                    </p>
                    <p>
                       আমার সোনার বাংলা আমি তোমায় ভালোবাসি। চিরদিন তোমার আকাশ তোমার বাতাস আমার কানে বাজায় বাশি।
                    </p>
                </div>
                <p><a class="btn btn-primary" href="#">SEE MORE</a></p>
            </li>
        @endfor
    </ul>
</div>
