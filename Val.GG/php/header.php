<?php
// Set $base to '' if in root, '../' if in a subfolder
if (!isset($base)) $base = '';
?>
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- Logo Start -->
                    <a href="<?php echo $base; ?>index.php" class="logo">
                        <img src="<?php echo $base; ?>assets/images/logo.png" alt="" style="width: 158px" />
                    </a>
                    <!-- Logo End -->
                    <!-- Menu Start -->
                    <ul class="nav">
                        <li><a href="<?php echo $base; ?>index.php" class="<?php echo (isset($activePage) && $activePage == 'home') ? 'active' : ''; ?>">Home</a></li>
                        <li><a href="<?php echo $base; ?>agents.php" class="<?php echo (isset($activePage) && $activePage == 'agents') ? 'active' : ''; ?>">Agents</a></li>
                        <li><a href="<?php echo $base; ?>maps.php" class="<?php echo (isset($activePage) && $activePage == 'maps') ? 'active' : ''; ?>">Maps</a></li>
                        <li><a href="<?php echo $base; ?>arsenal/arsenal.php" class="<?php echo (isset($activePage) && $activePage == 'arsenal') ? 'active' : ''; ?>">Arsenal</a></li>
                        <li class="dropdown">
                            <a href="<?php echo $base; ?>edit.php" style="cursor: default;"><?php echo htmlspecialchars($res_Uname ?? 'Sign In'); ?></a>
                            <?php if (isset($_SESSION['valid'])): ?>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo $base; ?>php/logout.php" class="logout-link"
                                            style="cursor: pointer; color: #ee6262; background-color: transparent; font-size: 12px">Log Out</a></li>
                                </ul>
                        </li>
                    <?php endif; ?>
                    </ul>
                    <a class="menu-trigger">
                        <span>Menu</span>
                    </a>
                    <!-- Menu End -->
                </nav>
            </div>
        </div>
    </div>
</header>