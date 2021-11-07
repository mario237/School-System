<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">const plugin_path = '{{ asset('assets/js') }}/';</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>




<script>
    $(document).ready(function(){
        $('#myTable').dataTable({
            "language": {
                "lengthMenu": ''
            },
            "search": {
                "addClass": 'form-control input-lg col-xs-12'
            },
            "fnDrawCallback":function(){
                $("#myTable_filter").css("width" , "100%");
                $("input[type='search']").attr("id", "searchBox");
                $('#dialPlanListTable').css('cssText', "margin-top: 0px !important;");
                $("select[name='dialPlanListTable_length'], #searchBox").removeClass("input-sm");
                $('#searchBox').css("width", "350px").focus();
                $('#dialPlanListTable_filter').removeClass('dataTables_filter');
            }
        } );
    })

</script>



@if (App::getLocale() === 'en')
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/en/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/en/dataTables.bootstrap4.min.js') }}"></script>
@else
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/ar/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datatables/ar/dataTables.bootstrap4.min.js') }}"></script>
@endif

<script>
    function CheckAll(className, elem) {
        let elements = document.getElementsByClassName(className);
        let length = elements.length;

        if (elem.checked) {
            for (let i = 0; i < length; i++) {
                elements[i].checked = true;
            }
        }
        else {
            for (let i = 0; i < length; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>
