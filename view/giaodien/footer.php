<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* CSS cho phần footer */
        footer {
            background-color:#e3c596;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .footer-logo {
            font-size: 24px;
            font-weight: bold;
        }

        .footer-nav {
            list-style-type: none;
            margin: 0;
            padding: 0;
            margin-right:20px;
        }

        .footer-nav li {
            display: inline;
            margin-right: 20px;
        }

        .footer-nav li:last-child {
            margin-right: 0;
        }

        .footer-nav a {
            color: #fff;
            text-decoration: none;
        }

        .footer-nav a:hover {
            text-decoration: underline;
        }
        html {
            scroll-behavior: smooth;
        }
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            color: #fff;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            font-size: 20px;
            transition: background-color 0.3s;
            z-index: 999; 
            display: none;
        }
        .back-to-top a:hover{
            transform: scale(1.1); 
        }

    </style>
</head>
<body>
    </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <footer>
                        <div class="footer-content">
                            <div class="footer-logo">
                                <!-- <img src="img/banner/logo.jpg" width="20%"alt=""> -->
                            </div>
                            <nav class="footer-nav">
                                <ul>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                </ul>
                            </nav>
                        </div>
                     
                        <p> FanPage: Wi Fashion </p>
                    </footer>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var backToTopButton = document.querySelector('.back-to-top');

                            window.addEventListener('scroll', function() {
                                if (window.pageYOffset > 150) { 
                                    backToTopButton.style.display = 'block';
                                } else {
                                    backToTopButton.style.display = 'none'; 
                                }
                            });

                            backToTopButton.addEventListener('click', function() {
                                window.scrollTo({
                                    top: 0,
                                    behavior: 'smooth'
                                });
                            });
                        });
                    </script>
                </td>   
            </tr>
    </table>

</body>
</html>