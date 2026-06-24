<?php
session_start();
include 'includes/connection.php';

// Fetch all reported items ordered by newest first (Procedural PHP style)
$sql = "SELECT * FROM items ORDER BY item_id DESC";
$result = mysqli_query($conn, $sql);
?>
    
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Reported Items - Smart Lost & Found</title>

    <!-- Link the same dashboard CSS stylesheet for consistent colors and layouts -->
    <link rel="stylesheet" type="text/css" href="assets/css/dashboard.css?v=1.2" />

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/all-items.css?v=1.0" />
</head>

<body>

    <?php include 'includes/navbar.php'; ?>

    <main class="all-items-container">
        
        <div class="page-header">
            <h1>All Reported Items</h1>
            <p>Browse through all the lost and found items reported across campus.</p>
        </div>

        <div class="item-grid">

            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {

                    $badgeClass = ($row['item_type'] == "Lost") ? "lost-badge" : "found-badge";
                    
                    // Fallback to default image if none uploaded
                    $image_src = !empty($row['image']) ? $row['image'] : 'assets/images/default-item.png';
                    ?>

                    <!-- ITEM CARD -->
                    <div class="item-card">

                        <div class="item-image">
                            <img src="<?php echo htmlspecialchars($image_src); ?>" alt="<?php echo htmlspecialchars($row['item_name']); ?>" />
                            <span class="<?php echo $badgeClass; ?>">
                                <?php echo htmlspecialchars($row['item_type']); ?>
                            </span>
                        </div>

                        <div class="item-content">
                            <h3><?php echo htmlspecialchars($row['item_name']); ?></h3>
                            
                            <p>
                                <strong>Location:</strong> <?php echo htmlspecialchars($row['location']); ?>
                            </p>
                            
                            <p>
                                <strong>Category:</strong> <?php echo htmlspecialchars($row['category']); ?>
                            </p>

                            <p>
                                <strong>Date:</strong> <?php echo htmlspecialchars($row['item_date']); ?>
                            </p>

                            <p style="margin-top: 10px; font-size: 14px; line-height: 1.5; color: #5e6c84;">
                                <?php echo htmlspecialchars(substr($row['description'], 0, 100)) . (strlen($row['description']) > 100 ? '...' : ''); ?>
                            </p>

                            <div class="item-actions" style="margin-top: 20px;">
                                <?php if ($row['item_type'] == "Lost"): ?>
                                    <a href="report-found.php?item_id=<?php echo $row['item_id']; ?>"
                                        class="action-btn report-found-btn">
                                        Report Found
                                    </a>
                                <?php else: ?>
                                    <a href="claim-item.php?item_id=<?php echo $row['item_id']; ?>" 
                                       class="claim-btn-link">
                                        Claim Item
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

                    <?php
                }
            } else {
                echo "<div style='grid-column: 1/-1; text-align: center; padding: 40px; background: white; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);'>
                        <span class='material-symbols-outlined' style='font-size: 48px; color: #5e6c84;'>inventory_2</span>
                        <p style='margin-top: 10px; font-size: 18px; color: #2b3674; font-weight: 600;'>No items reported yet.</p>
                      </div>";
            }
            ?>

        </div>

    </main>

    <!-- FOOTER -->
    <?php include 'includes/footer.php'; ?>

</body>

</html>
