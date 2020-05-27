<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./dist/semantic.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./dist/semantic.js" defer></script>
</head>


<body>
    <div class="ui attached stackable menu">
        <div class="ui container"><a class="item"><i class="home icon"></i>Home
            </a><a class="item"><i class="grid layout icon"></i>Browse </a><a class="item"><i
                    class="mail icon"></i>Messages </a>
            <div class="ui simple dropdown item">More <i class="dropdown
                        icon"></i>
                <div class="menu">
                    <a class="item"><i class="edit icon"></i>Edit Profile</a>
                    <a class="item"><i class="globe icon"></i>Choose Language</a>
                    <a href="setting.html" class="item"><i class="settings icon"></i>Account Settings</a>
                </div>
            </div>
            <div class="right item">
                <div class="ui input"><input type="text" placeholder="Search..."></div>
            </div>
        </div>
    </div>
    <button type="button" class="fa fa-plus" data-toggle="modal" data-target="#myModal">Product</button>

    <!-- Modal -->
    <div class="ui basic modal">
        <div class="ui icon header">
            <i class="archive icon"></i>
            Archive Old Messages
        </div>
        <div class="content">
            <div class="ui cards">

                <template>
                    <div class="card">
                        <div class="content">
                            <div class="header"></div>
                            <div class="meta"></div>
                            <div class="description"></div>
                        </div>
                    </div>
                </template>

                <script src="./products.js"></script>
            </div>
        </div>
        <div class="actions">
            <div class="ui red basic cancel inverted button">
                <i class="remove icon"></i>
                No
            </div>
            <div class="ui green ok inverted button">
                <i class="checkmark icon"></i>
                Yes
            </div>
        </div>
    </div>
    </div>

    <button class="ui basic button" onclick="$('.ui.basic.modal').modal('show')">Product</button>

    <!-- <div class="ui cards">

        <template>
            <div class="card">
                <div class="content">
                    <div class="header"></div>
                    <div class="meta"></div>
                    <div class="description"></div>
                </div>
            </div>
        </template>

        <script src="./products.js"></script>
    </div> -->

</body>

</html>