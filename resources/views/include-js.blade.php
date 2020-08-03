

<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/bootstrap-switch.js')}}"></script>

<script src="{{asset('assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/js/plugins/glide.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/choices.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/js/plugins/datetimepicker.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/js/plugins/jasny-bootstrap.min.js')}}"></script>

<script src="{{asset('assets/js/plugins/headroom.min.js')}}"></script>






<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="{{asset('assets/js/argon-design-system.min.js?v=1.0.2')}}" type="text/javascript"></script> 
<script src="{{asset('assets/demo/jquery.sharrre.js')}}"></script>



<script>

    $(document).ready(function(){
    
        // Code for the Validator
        var $validator = $('#login-form').validate({



            rules: {
    
                email: {
                    email: true,
                    required: true,
                    minlength: 3,
                },
    
                password: {
                    required: true,
                    minlength: 8,
                },
    
    
    
            },
    
            highlight: function(element) {
                $(element).parent('div').parent('div').removeClass('has-success').addClass('has-error');
            },
    
            success: function(element) {
                $(element).parent('div')
                    .removeClass('has-error')
                    .addClass('has-success');

                $(element).parent('div').children('.error').remove();
            },
    
            errorPlacement : function(error, element) {
                $(element).parent('div').parent('div').append(error);
                $(element).parent('div').parent('div').addClass('has-error');
            }
    
        });
    
    });
    
</script>


<script>

    $(document).ready(function(){
    
        // Code for the Validator
        var $validator = $('#inscription').validate({


            rules: {
    
                name: {
                    required: true,
                    minlength: 3
                },
            
                age: {
                    required: true,
                    min: 20, 
                    max: 100
                },
                
                email: {
                    required: true,
                    minlength: 3,
                    email: true
                },

                telephone: {
                    required: true,
                    minlength: 8,
                },

                sexe: {
                    required: true,
                },

                localite: {
                    required: true,
                },

                acte_naissance: {
                    required: true,
                },

                certificat_nationalite: {
                    required: true,
                },

                carte_identite: {
                    required: true,
                },

                password: {
                    required: true,
                    minlength: 8,
                },
    
    
    
            },
    
            highlight: function(element) {
                $(element).parent('div').removeClass('has-success').addClass('has-danger');
            },
    
            success: function(element) {
                $(element).parent('div').children('.has-danger')
                    .removeClass('has-error')
                    .removeClass('has-danger')
                    .addClass('has-success');

                $(element).parent('div').children('.error').remove();
            },
    
            errorPlacement : function(error, element) {
                $(element).parent('div').parent('div').append(error);
            }
    
        });
    
    });
    
</script>




<script src="{{asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
