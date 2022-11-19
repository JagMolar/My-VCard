<script src="{{ asset('all.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> --}}
<!-- Stack array for including inline js or scripts -->
@stack('script')

<script src="{{ asset('dist/js/theme.js') }}"></script>
{{-- <script src="{{ asset('js/chat.js') }}"></script> --}}

<!-- HTML2CANVAS -->

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("#download").click(function(){
            screenshot();
        });
    });

    function screenshot(){
        html2canvas(document.getElementById("cardQr")).then(function(canvas){
            downloadImage(canvas.toDataURL(),"{{$name}}"+"_VCard.png");
            // localStorage.setItem("{{$name}}"+"_VCard.png", canvas.toDataURL("image/png"));
        });
    }

    function downloadImage(uri, filename){
        var link = document.createElement('a');
        if(typeof link.download !== 'string'){
            window.open(uri);
        }else{
            link.href = uri;
            // console.log(uri);
            link.download = filename;
            accountForFirefox(clickLink, link);
        }
    }

    function saveImage(uri, filename){
        var link = document.createElement('a');
        if(typeof link.download !== 'string'){
            window.open(uri);
        }else{
            link.href = uri;
            // console.log(uri);
            const reader = new FileReader();
            reader.addEventListener("load", () => {
                localStorage.setItem("{{$name}}"+"_VCard.png", reader.result);
            });
            // reader.canvas.toDataURL("image/png");
            reader.readAsDataURL(this.files[0]);
            link.download = filename;
            // link.saveAsPNG= filename;
            accountForFirefox(clickLink, link);
        }
    }




    function clickLink(link){
        link.click();
    }

    function accountForFirefox(click){
        var link =arguments[1];
        document.body.appendChild(link);
        click(link);
        document.body.removeChild(link);
    }

</script>