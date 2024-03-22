<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Backend Interview</title>
    <link rel="shortcut icon" type="image/fav" href="https://laravel.com/img/favicon/favicon-32x32.png" />
    <link rel="stylesheet" href="css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div id="main-wrapper">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="/" class="text-nowrap logo-img text-center d-block  w-100">
                                    <img src="images/logo.png" height="250px" class="dark-logo" alt="Logo-Dark">
                                    <img src="../assets/images/logos/light-logo.svg" class="light-logo" alt="Logo-light" style="display: none;">
                                </a>
                                <p class="text-center mb-5">{{ isset($abTest['brand-text'])  ?  $abTest['brand-text'] : 'Your Social Campaigns' }}</p>
                                @if(isset($abTest['show-social-logins']) && $abTest['show-social-logins'] != 'false')
                                <div class="row">
                                    <div class="col-6 mb-2 mb-sm-0">
                                        <a class="btn text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8 gap-2" href="javascript:void(0)" role="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google-filled" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12 2a9.96 9.96 0 0 1 6.29 2.226a1 1 0 0 1 .04 1.52l-1.51 1.362a1 1 0 0 1 -1.265 .06a6 6 0 1 0 2.103 6.836l.001 -.004h-3.66a1 1 0 0 1 -.992 -.883l-.007 -.117v-2a1 1 0 0 1 1 -1h6.945a1 1 0 0 1 .994 .89c.04 .367 .061 .737 .061 1.11c0 5.523 -4.477 10 -10 10s-10 -4.477 -10 -10s4.477 -10 10 -10z" stroke-width="0" fill="currentColor" />
                                            </svg>
                                            <span class="flex-shrink-0">with Google</span>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8 gap-2" href="javascript:void(0)" role="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook-filled" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M18 2a1 1 0 0 1 .993 .883l.007 .117v4a1 1 0 0 1 -.883 .993l-.117 .007h-3v1h3a1 1 0 0 1 .991 1.131l-.02 .112l-1 4a1 1 0 0 1 -.858 .75l-.113 .007h-2v6a1 1 0 0 1 -.883 .993l-.117 .007h-4a1 1 0 0 1 -.993 -.883l-.007 -.117v-6h-2a1 1 0 0 1 -.993 -.883l-.007 -.117v-4a1 1 0 0 1 .883 -.993l.117 -.007h2v-1a6 6 0 0 1 5.775 -5.996l.225 -.004h3z" stroke-width="0" fill="currentColor" />
                                            </svg>
                                            <span class="flex-shrink-0">with FB</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="position-relative text-center my-4">
                                    <p class="mb-0 fs-4 px-3 d-inline-block bg-white z-index-5 position-relative" style="z-index: 100;">or sign Up with</p>
                                    <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                                </div>
                                @endif
                                <form>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="exampleInputtext" aria-describedby="textHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>

                                    <a href="#" id="register-btn" class="btn {{ isset($abTest['cta-button-type']) ?  'btn-' .  $abTest['cta-button-type'] : 'btn-primary' }} w-100 py-8 mb-4 rounded-2">Sign Up</a>
                                    <div class="d-flex align-items-center">
                                        <p class="fs-4 mb-0 text-dark">Already have an Account?</p>
                                        <a class="text-primary fw-medium ms-2" href="#">Sign In</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function handleColorTheme(e) {
                $("html").attr("data-color-theme", e);
                $(e).prop("checked", !0);
            }
        </script>
        <button class="btn btn-primary p-3 rounded-circle d-flex align-items-center justify-content-center customizer-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="icon ti ti-settings fs-7"></i>
        </button>

        <div class="offcanvas customizer offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
                <h4 class="offcanvas-title fw-semibold" id="offcanvasExampleLabel">
                    Settings
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body h-n80" data-simplebar="init">
                <div class="simplebar-wrapper" style="margin: -16px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden;">
                                <div class="simplebar-content" style="padding: 16px;">
                                    <h6 class="fw-semibold fs-4 mb-2">Theme</h6>

                                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                                        <input type="radio" class="btn-check light-layout" name="theme-layout" id="light-layout" autocomplete="off">
                                        <label class="btn p-9 btn-outline-primary rounded-2" for="light-layout"><i class="icon ti ti-brightness-up fs-7 me-2"></i>Light</label>

                                        <input type="radio" class="btn-check dark-layout" name="theme-layout" id="dark-layout" autocomplete="off">
                                        <label class="btn p-9 btn-outline-primary rounded-2" for="dark-layout"><i class="icon ti ti-moon fs-7 me-2"></i>Dark</label>
                                    </div>

                                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Direction</h6>
                                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                                        <input type="radio" class="btn-check" name="direction-l" id="ltr-layout" autocomplete="off">
                                        <label class="btn p-9 btn-outline-primary" for="ltr-layout"><i class="icon ti ti-text-direction-ltr fs-7 me-2"></i>LTR</label>

                                        <input type="radio" class="btn-check" name="direction-l" id="rtl-layout" autocomplete="off">
                                        <label class="btn p-9 btn-outline-primary" for="rtl-layout"><i class="icon ti ti-text-direction-rtl fs-7 me-2"></i>RTL</label>
                                    </div>

                                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Theme Colors</h6>

                                    <div class="d-flex flex-row flex-wrap gap-3 customizer-box color-pallete" role="group">
                                        <input type="radio" class="btn-check" name="color-theme-layout" id="Blue_Theme" autocomplete="off">
                                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Blue_Theme')" for="Blue_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="BLUE_THEME">
                                            <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-1">
                                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                                            </div>
                                        </label>

                                        <input type="radio" class="btn-check" name="color-theme-layout" id="Aqua_Theme" autocomplete="off">
                                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Aqua_Theme')" for="Aqua_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="AQUA_THEME">
                                            <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-2">
                                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                                            </div>
                                        </label>

                                        <input type="radio" class="btn-check" name="color-theme-layout" id="Purple_Theme" autocomplete="off">
                                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Purple_Theme')" for="Purple_Theme" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="PURPLE_THEME">
                                            <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-3">
                                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                                            </div>
                                        </label>

                                        <input type="radio" class="btn-check" name="color-theme-layout" id="green-theme-layout" autocomplete="off">
                                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Green_Theme')" for="green-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="GREEN_THEME">
                                            <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-4">
                                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                                            </div>
                                        </label>

                                        <input type="radio" class="btn-check" name="color-theme-layout" id="cyan-theme-layout" autocomplete="off">
                                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Cyan_Theme')" for="cyan-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="CYAN_THEME">
                                            <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-5">
                                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                                            </div>
                                        </label>

                                        <input type="radio" class="btn-check" name="color-theme-layout" id="orange-theme-layout" autocomplete="off">
                                        <label class="btn p-9 btn-outline-primary d-flex align-items-center justify-content-center" onclick="handleColorTheme('Orange_Theme')" for="orange-theme-layout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="ORANGE_THEME">
                                            <div class="color-box rounded-circle d-flex align-items-center justify-content-center skin-6">
                                                <i class="ti ti-check text-white d-flex icon fs-5"></i>
                                            </div>
                                        </label>
                                    </div>

                                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Layout Type</h6>
                                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                                        <div>
                                            <input type="radio" class="btn-check" name="page-layout" id="vertical-layout" autocomplete="off">
                                            <label class="btn p-9 btn-outline-primary" for="vertical-layout"><i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Vertical</label>
                                        </div>
                                        <div>
                                            <input type="radio" class="btn-check" name="page-layout" id="horizontal-layout" autocomplete="off">
                                            <label class="btn p-9 btn-outline-primary" for="horizontal-layout"><i class="icon ti ti-layout-navbar fs-7 me-2"></i>Horizontal</label>
                                        </div>
                                    </div>

                                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Container Option</h6>

                                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                                        <input type="radio" class="btn-check" name="layout" id="boxed-layout" autocomplete="off">
                                        <label class="btn p-9 btn-outline-primary" for="boxed-layout"><i class="icon ti ti-layout-distribute-vertical fs-7 me-2"></i>Boxed</label>

                                        <input type="radio" class="btn-check" name="layout" id="full-layout" autocomplete="off">
                                        <label class="btn p-9 btn-outline-primary" for="full-layout"><i class="icon ti ti-layout-distribute-horizontal fs-7 me-2"></i>Full</label>
                                    </div>

                                    <h6 class="fw-semibold fs-4 mb-2 mt-5">Sidebar Type</h6>
                                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                                        <a href="javascript:void(0)" class="fullsidebar">
                                            <input type="radio" class="btn-check" name="sidebar-type" id="full-sidebar" autocomplete="off">
                                            <label class="btn p-9 btn-outline-primary" for="full-sidebar"><i class="icon ti ti-layout-sidebar-right fs-7 me-2"></i>Full</label>
                                        </a>
                                        <div>
                                            <input type="radio" class="btn-check " name="sidebar-type" id="mini-sidebar" autocomplete="off">
                                            <label class="btn p-9 btn-outline-primary" for="mini-sidebar"><i class="icon ti ti-layout-sidebar fs-7 me-2"></i>Collapse</label>
                                        </div>
                                    </div>

                                    <h6 class="mt-5 fw-semibold fs-4 mb-2">Card With</h6>

                                    <div class="d-flex flex-row gap-3 customizer-box" role="group">
                                        <input type="radio" class="btn-check" name="card-layout" id="card-with-border" autocomplete="off">
                                        <label class="btn p-9 btn-outline-primary" for="card-with-border"><i class="icon ti ti-border-outer fs-7 me-2"></i>Border</label>

                                        <input type="radio" class="btn-check" name="card-layout" id="card-without-border" autocomplete="off">
                                        <label class="btn p-9 btn-outline-primary" for="card-without-border"><i class="icon ti ti-border-none fs-7 me-2"></i>Shadow</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="simplebar-placeholder" style="width: 330px; height: 1055px;"></div>
                </div>
                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="width: 0px; transform: translate3d(0px, 0px, 0px); display: none;"></div>
                </div>
                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                    <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/app.min.js"></script>
    <script src="js/dashboard.js"></script>

</body>

</html>