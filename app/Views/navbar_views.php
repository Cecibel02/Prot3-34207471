
    <?php
$session = session();
$nombre = $session->get('nombre');
$perfil_id = $session->get('perfil_id');
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top mb-3" data-bs-theme='dark'>
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('/') ?>">SynergyPath</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="<?= base_url('/') ?>">Principal</a>
                <a class="nav-link" href="<?= base_url('/quienesSomos') ?>">Quienes Somos?</a>
                <?php if ($session->get('logged_in')) : ?>
                    <?php if ($perfil_id == 1) : ?>
                        <a class="nav-link" href="<?= base_url('/listaUsuarios') ?>" aria-disabled="true">Lista Usuarios</a>
                    <?php elseif ($perfil_id == 2) : ?>
                        <a class="nav-link" href="<?= base_url('/cliente') ?>" aria-disabled="true">Cliente</a>
                    <?php else : ?>
                        <a class="nav-link" href="<?= base_url('/cliente') ?>" aria-disabled="true">Cliente</a>
                    <?php endif; ?>
                    <a class="nav-link" href="<?= base_url('/logout') ?>" aria-disabled="true">Logout</a>
                    <a class="nav-link" href="#" aria-disabled="true">Hola, <?= $nombre ?></a>
                <?php else : ?>
                    <a class="nav-link" href="<?= base_url('/login') ?>" aria-disabled="true">Iniciar Sesión</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>