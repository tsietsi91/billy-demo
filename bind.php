<?php
/*
 * @author Shahrukh Khan
 * @website http://www.thesoftwareguy.in
 * @facebbok https://www.facebook.com/Thesoftwareguy7
 * @twitter https://twitter.com/thesoftwareguy7
 * @googleplus https://plus.google.com/+thesoftwareguyIn
 */

require("configure.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="icon" href="http://www.thesoftwareguy.in/favicon.ico" type="image/x-icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Multiple dropdown with jquery ajax and php">
        <meta name="keywords" content="Multiple dropdown with jquery ajax and php">
        <meta name="author" content="Shahrukh Khan">
        <title>Multiple dropdown with jquery ajax and php - thesoftwareguy</title>
        <title>Multiple dropdown with jquery ajax and php - thesoftwareguy</title>

        <link rel="stylesheet" href="style.css" type="text/css" />
        <style>
            select {
                padding:3px;
                border-radius:5px;
                background: #f8f8f8;
                color:#000;
                border:1px solid #EB028F;
                outline:none;
                display: inline-block;
                width:250px;
                cursor:pointer;
                text-align:left;
                font:inherit;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <div id="body">
                <div class="mainTitle" >Multiple dropdown with jquery ajax and php</div>
                <div class="height20"></div>
                <article>
                    <table style="margin:0 auto;width:50%" >
                        <tr>
                            <td align="center" height="50">
                                <?php
                                $sql = "SELECT * FROM make ORDER BY make";
                                try {
                                    $stmt = $DB->prepare($sql);
                                    $stmt->execute();
                                    $results = $stmt->fetchAll();
                                } catch (Exception $ex) {
                                    echo($ex->getMessage());
                                }
                                ?>
                                <label>Make:
                                    <select name="make" onChange="showState(this);">
                                        <option value="">Please Select</option>
                                        <?php foreach ($results as $rs) { ?>
                                            <option value="<?php echo $rs["id"]; ?>"><?php echo $rs["make"]; ?></option>
                                        <?php } ?>
                                    </select>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" height="50"><div id="output1"></div> </td>
                        </tr>
                        <tr>
                            <td align="center" height="50"><div id="output2"></div> </td>
                        </tr>
                    </table> 
                    <div class="height10"></div>
                    <div style="margin:10px 0;width:100%;float: left;">
                        <div style="width:35%;float: left;margin:0 auto;text-align: center;">
                            <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FThesoftwareguy7&amp;width&amp;height=360&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=198210627014732" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:360px;" allowTransparency="true"></iframe>
                        </div>
                        <div style="width:35%;float: left;margin:0 auto;text-align: center;">
                            <!-- Place this tag where you want the widget to render. -->
                            <div class="g-person" data-href="https://plus.google.com/116523474604785207782"  data-rel="author" data-layout="potrait"></div>

                            <!-- Place this tag after the last widget tag. -->
                            <script type="text/javascript">
                                (function() {
                                    var po = document.createElement('script');
                                    po.type = 'text/javascript';
                                    po.async = true;
                                    po.src = 'https://apis.google.com/js/platform.js';
                                    var s = document.getElementsByTagName('script')[0];
                                    s.parentNode.insertBefore(po, s);
                                })();
                            </script>
                        </div>
                        <div style="width:30%;float: left;margin:0 auto;text-align: center;">
                            <a class="twitter-follow-button"
                               href="https://twitter.com/thesoftwareguy7"
                               data-show-count="true" 
                               data-lang="en" data-size="large" >
                                Follow @thesoftwareguy7
                            </a>
                            <script type="text/javascript">
                                window.twttr = (function(d, s, id) {
                                    var t, js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id))
                                        return;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = "https://platform.twitter.com/widgets.js";
                                    fjs.parentNode.insertBefore(js, fjs);
                                    return window.twttr || (t = {_e: [], ready: function(f) {
                                            t._e.push(f)
                                        }});
                                }(document, "script", "twitter-wjs"));
                            </script>
                        </div>
                    </div>


                </article>
                <div class="height10"></div>
                <footer>
                    <div class="copyright">&copy; thesoftwareguy All right Reserved</div>
                    <div class="footerlogo"><a href="http://www.thesoftwareguy.in" target="_blank"><img src="http://www.thesoftwareguy.in/thesoftwareguy-logo-small.png" width="200" height="47" alt="thesoftwareguy logo" /></a> </div>
                </footer>
            </div>
        </div>
        <script src="jquery-1.9.0.min.js"></script>
        <script>
                    function showState(sel) {
                        var make_id = sel.options[sel.selectedIndex].value;
                        $("#output1").html("");
                        $("#output2").html("");
                        if (make_id.length > 0) {

                            $.ajax({
                                type: "POST",
                                url: "fetch_state.php",
                                data: "make_id=" + make_id,
                                cache: false,
                                beforeSend: function() {
                                    $('#output1').html('<img src="loader.gif" alt="" width="24" height="24">');
                                },
                                success: function(html) {
                                    $("#output1").html(html);
                                }
                            });
                        }
                    }

                    function showCity(sel) {
                        var state_id = sel.options[sel.selectedIndex].value;
                        if (state_id.length > 0) {
                            $.ajax({
                                type: "POST",
                                url: "fetch_city.php",
                                data: "state_id=" + state_id,
                                cache: false,
                                beforeSend: function() {
                                    $('#output2').html('<img src="loader.gif" alt="" width="24" height="24">');
                                },
                                success: function(html) {
                                    $("#output2").html(html);
                                }
                            });
                        } else {
                            $("#output2").html("");
                        }
                    }
        </script>
    </body>
</html>
