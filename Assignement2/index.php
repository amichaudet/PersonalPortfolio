<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Your profile
        </title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1>Create your profile</h1>
                <form action="view.php" method="POST">
                    <div>
                        <label>Enter your name: </label>
                        <input type="text" name="name"/>
                    </div>
                    <p>
                        What is your genre:
                        <select name = "genre" class = "genre" required>
                            <option selected disabled hidden value = ''></option>
                            <option value = "Male">Male</option>
                            <option value = "Female">Female</option>
                            <option value = "Unknown">Unknown</option>
                            
                        </select>
                    </p>
                    <p>
                        Where do you come from ?
                    </p>
                    <div class="radios">
                        <input type="radio" name="origine" value="Europe">Europe<br>
                        <input type="radio" name="origine" value="America">America<br>
                        <input type="radio" name="origine" value="Asia">Asia<br>
                        <input type="radio" name="origine" value="Africa">Africa<br>
                    </div>
                    <p>What are your hobbies</p>
                    <div class = "radios">
                        <input type="checkbox" name="hobby[]" value="Sports">Sports<br>
                        <input type="checkbox" name="hobby[]" value="TV">TV<br>
                        <input type="checkbox" name="hobby[]" value="Travel">Travel<br>
                        <input type="checkbox" name="hobby[]" value="Read">Read<br>
                        <input type="checkbox" name="hobby[]" value="Music">Music<br>

                    </div>
                    <div>
                        <label>Enter your email address: </label>
                        <input type="text" name="email"/>
                    </div>
                    <p>
                        What is your age:
                        <select name = "age" class = "age" required>
                            <option selected disabled hidden value = ''></option>
                            <option value = "0-15">0-15</option>
                            <option value = "16-35">16-35</option>
                            <option value = "36-50">36-50</option>
                            <option value = "51-70">51-70</option>
                            <option value = "71-100+">71-100+</option>
                            
                        </select>
                    </p>
                    <div class = "submission">
                        <input class = "submit" type="image" src="http://www.clker.com/cliparts/2/k/n/l/C/Q/transparent-green-checkmark-hi.png" border="0" width="175" height = "50" alt="Submit" />
                    </div>
                    
                </form>
            </div>
        </div>
    </body>
</html>