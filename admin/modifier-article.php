<?php 
	include('functions.php');
	$pdo = pdo_connect_mysql();
	$msg = '';

	if(isset($_GET['id'])){

		$stmt = $pdo->prepare('SELECT * FROM articles WHERE id = ?');
		$stmt->execute([$_GET['id']]);
		$articles = $stmt->fetch(PDO::FETCH_ASSOC);

		$photo = $articles['photo'];
}

if(isset($_POST['update'])){

		$id = $_POST['id'];
		$titre = $_POST['titre'];
		$description = $_POST['description'];

		$stmt = $pdo->query("UPDATE articles SET titre = '$titre', description = '$description' WHERE id = $id");
		$msg = 'Article Modifié avec succès';
	}

?>

<!DOCTYPE html>
<html>
	<head>
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
											Modifier article
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
										<?php echo strftime('%d %B %Y'); ?>
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
								<p class="mb-30">Modifier Article <strong>N°<?= $articles['id'] ?></strong></p>
							</div>
							
						</div>

						


						<form action="modifier-article.php?id=<?= $articles['id'] ?>" method="POST" enctype="multipart/form-data">
							
                            <div class="row">
							<input type="hidden" name="id" value="<?= $articles['id'] ?>" class="form-control" />
								<div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Titre de l'article</label>
                                            <input type="text" name="titre" value="<?= $articles['titre'] ?>" class="form-control" />
                                        </div>

                                        <!-- <div class="form-group">
                                            <label>Image principale</label>
                                            <input type="file" name="img" class="form-control" />
                                        </div> -->

                                        <div class="form-group">
                                            <label>Description/Contenu</label>
                                            <textarea name="description"
                                                class="textarea_editor form-control border-radius-0"
                                                placeholder="Enter text ..." 
                                            ><?= $articles['description'] ?></textarea>
                                        </div>

                                        <input type="submit" name="update" class="btn" data-bgcolor="#3b5998"
										data-color="#ffffff" value="Modifier">
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
