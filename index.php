<?php       
        
echo ' 
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>PHP Application</title>
	<link href="css/site.css" rel="stylesheet">
</head>

<body>
<![endif]-->

<div class="main-container">
<iframe width="1080px" height="1920px" src="https://forms.office.com/Pages/ResponsePage.aspx?id=DQSIkWdsW0yxEjajBLZtrQAAAAAAAAAAAAN__tJO_StURVVPNVFGRTZENkpUVkMzSVpVRFUxNURXQi4u&embed=true" frameborder="0" marginwidth="0" marginheight="0" style="border: none; max-width:100%; max-height:100vh"
    allowfullscreen webkitallowfullscreen mozallowfullscreen msallowfullscreen> </iframe>

        <div class="cloud-image">
            <img src="img/successCloudNew.svg" alt="successCloudNew" />
        </div>
        <div class="content">
            <div class="tweet-container">
            <a href="http://twitter.com/intent/tweet/?text=I%20just%20created%20a%20new%20PHP%20website%20on%20Azure%20using%20Github%20Actions&hashtags=%40GithubActions%20%40Azure">
                <img src="img/tweetThis.svg" alt="tweetThis" />
            </a>
        </div>
            <div class="content-body">
                <div class="success-text">CentralPark</div>
                <div class="description line-1">
			
				"Your Github Repository: CENTRALPARK with Github Actions has been successfully setup"
				
				</div>
                <div class="description line-2">
				<?php
				$appType = "PHP";
				echo "Your $appType app is up and running on Azure";
				?>
				</div>
                <div class="next-steps-container">
                    <div class="next-steps-header">Next up</div>
                    <div class="next-steps-body">
                        <div class="step">
                            <div class="step-icon">
                                <img src="img/cloneWhite.svg" alt="cloneWhite" >
                            </div>
                            <div class="step-text"><a href="https://docs.github.com/en/github/creating-cloning-and-archiving-repositories/cloning-a-repository">Clone your code repository and start developing your application on IDE of your choice</a></div>
                        </div>
                        <div class="step">
                            <div class="step-icon">
                                <img src="img/deployWhite.svg" alt="deployWhite">
                            </div>
                            <div class="step-text"><a href="https://docs.github.com/en/actions">View your CI/CD pipeline on Github and customize it as per your needs</a></div>
                        </div>
                        <div class="step">
                            <div class="step-icon">
                                <img src="img/stackWhite.svg" alt="stackWhite">
                            </div>
                            <div class="step-text"><a href="http://portal.azure.com">View your service stack in the Azure Portal</a></div>
                        </div>
                        <div class="step">
                            <div class="step-icon">
                                <img src="img/lightbulbWhite.svg" alt="lightbulbWhite">
                            </div>
                            <div class="step-text"><a href="https://docs.github.com">Learn more about all you can do with Github by visiting the documentation</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>';
?>
