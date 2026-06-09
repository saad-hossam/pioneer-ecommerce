<!DOCTYPE html>
<html>
<head>
    <title>Pioneer</title>
<style>
.navbar {
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

.dropdown-menu {
    border-radius: 10px;
    padding: 8px;
}

.dropdown-item {
    border-radius: 8px;
}

.dropdown-item:hover {
    background: #f1f1f1;
}
</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            Pioneer
        </a>

        <div class="ms-auto">

            <div class="dropdown">
                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    🌐 {{ app()->getLocale() == 'ar' ? 'اللغة' : 'Language' }}
                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                            🇺🇸 English
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
                            🇪🇬 العربية
                        </a>
                    </li>

                </ul>
            </div>

        </div>

    </div>
</nav>

                </tbody>
            </table>

        </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
