

<!-- Argon Scripts -->
<!-- Core -->
<script src="{{asset('dashboard/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('dashboard/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dashboard/assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('dashboard/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('dashboard/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>


<!-- Optional JS -->
<script src="{{asset('dashboard/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('dashboard/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>


<!-- Argon JS -->
<script src="{{asset('dashboard/assets/js/argon.js?v=1.2.0')}}"></script>


<script src="{{asset('assets/js/plugins/jquery.validate.min.js')}}"></script>




<script>

    $('.supprimer').click(function () {
      
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');

        $("#deleteForm", 'input').val(id);
        $("#deleteForm").attr("action", url);

        
    });

    $('.edit').click(function () {
        
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var type = $(this).attr('data-type');
        var modele = $(this).attr('data-modele');
        var marque = $(this).attr('data-marque');

        $("#updateForm").attr("action", url);
        $("#type-upadate").attr("value", type);
        $("#modele-upadate").attr("value", modele);
        $("#marque-upadate").attr("value", marque);

    });


</script>



<script>

    $(document).ready(function(){
    
        // Code for the Validator
        var $validator = $('#user-update').validate({


            rules: {
    
                email: {
                    email: true,
                    required: true,
                    minlength: 3,
                },
    
                name: {
                    required: true,
                    minlength: 8,
                },

                telephone: {
                    required: true,
                    minlength: 8,
                    number: true
                },

                sexe: {
                    required: true,
                },

                age: {
                    required: true,
                    number:true,
                    max: 100,
                    min: 20
                },

                localite: {
                    required: true,
                },
    
    
    
            },
    
            highlight: function(element) {
                $(element).parent('div').parent('div').removeClass('has-success').addClass('has-danger');
            },
    
            success: function(element) {
                $(element).parent('div')
                    .removeClass('has-error')
                    .addClass('has-success');

                $(element).parent('div').children('.error').remove();
            },
    
            errorPlacement : function(error, element) {
                $(element).parent('div').append(error);
                $(element).parent('div').removeClass('has-success').addClass('has-error');
                $(element).parent('div').addClass('has-danger');
            }
    
        });
    
    });
    
</script>

