<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © {{ $comp_name }}.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by {{ $comp_full_name }}
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->



<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{ asset('https://cdn.datatables.net/2.3.0/js/dataTables.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="assets/js/pages/select2.init.js"></script>

<!-- JAVASCRIPT -->
<script src="{{ asset('software/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('software/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('software/assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('software/assets/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('software/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('software/assets/js/plugins.js') }}"></script>

<!-- apexcharts -->
<script src="{{ asset('software/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- Vector map-->
<script src="{{ asset('software/assets/libs/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('software/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

<!-- Swiper slider js -->
<script src="{{ asset('software/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

<!-- Dashboard init -->
<script src="{{ asset('software/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('software/assets/js/app.js') }}"></script>

<script>
    let table = new DataTable('#myTable');
</script>
</body>



</html>
