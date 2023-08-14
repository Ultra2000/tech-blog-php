<?php 
	include('functions.php');
	$pdo = pdo_connect_mysql();
	$msg = '';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// Post data not empty insert a new record
		// Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
		$id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
		// Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
		$titre = isset($_POST['titre']) ? $_POST['titre'] : '';
		$description = isset($_POST['description']) ? $_POST['description'] : '';

		$photo = $_FILES['img'];

		if(!empty($_FILES['img']['name'])){

			$target_dir = 'images/';
			$image_path = $target_dir . basename($_FILES['img']['name']);
			move_uploaded_file($_FILES['img']['tmp_name'], $image_path);
		}
		
		// Insert new record into the contacts table
		$stmt = $pdo->prepare('INSERT INTO articles VALUES (?, ?, ?, ?)');
		$stmt->execute([$id, $titre, $_FILES['img']['name'], $description]);
		// Output message
		$msg = 'Article ajouté avec succès';
		
	}
?>

<!DOCTYPE html>
<html>
	<head>
	<script src="https://cdn.tiny.cloud/1/the07912iqjnre3tv6ft51kms1i4zkh5c88npbdezgcby7e3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>	
	<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

		<!-- Site favicon --> 
		<link
			rel="apple-touch-icon"
			sizes="180x180"
			href="vendors/images/apple-touch-icon.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="32x32"
			href="vendors/images/favicon-32x32.png"
		/>
		<link
			rel="icon"
			type="image/png"
			sizes="16x16"
			href="vendors/images/favicon-16x16.png"
		/>

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- Google Font -->
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="vendors/styles/core.css" />
		<link
			rel="stylesheet"
			type="text/css"
			href="vendors/styles/icon-font.min.css"
		/>
		<link rel="stylesheet" type="text/css" href="vendors/styles/style.css" />

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script
			async
			src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"
		></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag() {
				dataLayer.push(arguments);
			}
			gtag("js", new Date());

			gtag("config", "G-GBZ3SGGX85");
		</script>
		<!-- Google Tag Manager -->
		<script>
			(function (w, d, s, l, i) {
				w[l] = w[l] || [];
				w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
				var f = d.getElementsByTagName(s)[0],
					j = d.createElement(s),
					dl = l != "dataLayer" ? "&l=" + l : "";
				j.async = true;
				j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
				f.parentNode.insertBefore(j, f);
			})(window, document, "script", "dataLayer", "GTM-NXZMQSS");
		</script>
		<!-- End Google Tag Manager -->
	</head>
	<body>


	
        <?php include('entete.php'); ?>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="title">
									<h4>Articles</h4>
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											<a href="index.php">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Ajouter des articles
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div class="dropdown">
									<a
										class="btn btn-secondary dropdown-toggle"
										href="#"
										role="button"
										data-toggle="dropdown"
									>
										January 2018
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Export List</a>
										<a class="dropdown-item" href="#">Policies</a>
										<a class="dropdown-item" href="#">View Assets</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="pd-20 card-box mb-30">
					<?php if($msg): ?>
						<div
							class="alert alert-success alert-dismissible fade show"
							role="alert"
						>
							<?php echo $msg; ?>
							<button
								type="button"
								class="close"
								data-dismiss="alert"
								aria-label="Close"
							>
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>
						<div class="clearfix">
							<div class="pull-left">
								<h4 class="text-blue h4">Article</h4>
								<p class="mb-30">Ajout d'un nouvel article dans la base de données</p>
							</div>
							
						</div>

						


						<form action="ajouter-article.php" method="POST" enctype="multipart/form-data">
							
                            <div class="row">
								<div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Titre de l'article</label>
                                            <input type="text" name="titre" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label>Image principale</label>
                                            <input type="file" name="img" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label>Description/Contenu</label>
                                            <textarea name="description"
                                                class="form-control border-radius-0"
                                                placeholder="Enter text ..." 
                                            ></textarea>
                                        </div>

                                        <input type="submit" class="btn" data-bgcolor="#3b5998"
										data-color="#ffffff" value="Enregistrer">
                                    </div>
                                </div>

                            </div>
							
						</form>
					
					</div>

				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					FRECORP
				</div>
			</div>
		</div>
		<!-- welcome modal start -->
		
		<!-- welcome modal end -->
		<!-- js -->
		<script>
		tinymce.init({
			selector: 'textarea',
			plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
			toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
		});
		</script>
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<noscript
			><iframe
				src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS"
				height="0"
				width="0"
				style="display: none; visibility: hidden"
			></iframe
		></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
