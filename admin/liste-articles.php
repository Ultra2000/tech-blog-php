<?php
	include('functions.php');
	$pdo = pdo_connect_mysql();
    $msg = '';
	session_start();

	$stmt = $pdo->prepare('SELECT * FROM articles ORDER BY id DESC');
	$stmt->execute();
	$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>Liste des Articles</title>

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
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/datatables/css/dataTables.bootstrap4.min.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="src/plugins/datatables/css/responsive.bootstrap4.min.css"
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
											<a href="index.html">Home</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Liste des Articles
										</li>
									</ol>
								</nav>
							</div>
							<div class="col-md-6 col-sm-12 text-right">
								<div>
									<a
										class="btn btn-primary"
										href="ajouter-article.php"
										role="button"
									>
										Ajouter Article
									</a>
									
								</div>
							</div>
						</div>
					</div>
					
					
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">Les articles enregistrés dans notre base de données</h4>
						</div>
                        
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



						<div class="card-box pb-10">
					<div class="h5 pd-20 mb-0"></div>
					<table class="data-table table nowrap">
						<thead>
							<tr>
								<th class="table-plus">Photo</th>
								<th>Titre</th>
								<th>Catégorie</th>
								<th>Auteur</th>
								<th>Date d'ajout</th>
								<th class="datatable-nosort">Actions</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach($articles as $articles): ?>
							<tr>
								<td class="table-plus">
									<div class="name-avatar d-flex align-items-center">
										<div class="avatar mr-2 flex-shrink-0">
											<img
												src="images/<?= $articles['photo'] ?>"
												class="border-radius-100 shadow"
												width="50"
												height="50"
												alt=""
											/>
										</div>
										<!-- <div class="txt">
											<div class="weight-600"></div>
										</div> -->
									</div>
								</td>
								<td><?= $articles['titre'] ?></td>
								<td>Cryptomonnaies</td>
                                <td>
									<span
										class="badge badge-pill"
										data-bgcolor="#e7ebf5"
										data-color="#265ed7"
										>TechHunt</span
									>
								</td>
								<td>19 Fev 2023</td>
								
								<td>
									<div class="table-actions">
										<a href="modifier-article.php?id=<?= $articles['id'] ?>" data-color="#265ed7"
											><i class="icon-copy dw dw-edit2"></i
										></a>
										<a href="supprimer-article?id=<?= $articles['id'] ?>" data-color="#e95959"
											><i class="icon-copy dw dw-delete-3"></i
										></a>
									</div>
								</td>
							</tr>
                            <?php endforeach; ?>
						</tbody>
					</table>
				</div>
					</div>
					<!-- Export Datatable End -->
				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
					G-STOCK BY FRECORP
				</div>
			</div>
		</div>
		
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<!-- buttons for Export datatable -->
		<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
		<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
		<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
		<!-- Datatable Setting js -->
		<script src="vendors/scripts/datatable-setting.js"></script>
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
