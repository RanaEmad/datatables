<!DOCTYPE html>
<html>
    <head>
        <title>Users</title>
        <!--BEGIN CSS-->
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/datatables.min.css"/>
        <!--END CSS-->
    </head>
    <body>

        <table id="users" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Birth Date</th>
                </tr>
            </thead>
        </table>
        <!--BEGIN SCRIPTS-->
        <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/js/datatables.min.js"></script>
        <script type="text/javascript" language="javascript">
            $(document).ready(function () {
                var users = $('#users').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        url: "<?= base_url() ?>Users/ajax_get_users",
                        type: "post"
                    }
                });
            });
        </script>
        <!--END SCRIPTS-->
    </body>
</html>