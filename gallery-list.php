<?php
header("Content-Type: application/json");
$folders = ["Aagman", "Activities", "Nimarjanam", "Pooja"];
$output = [];
$img_extensions = "{jpg,jpeg,png,gif}";
foreach ($folders as $folder) {
    $img_path = "images/$folder/";
    if (is_dir($img_path)) {
        foreach (glob("$img_path*.$img_extensions", GLOB_BRACE) as $file) {
            $output[] = [
                "src" => $file,
                "category" => strtolower($folder),
                "name" => basename($file),
                "type" => "image"
            ];
        }
    }
}
echo json_encode($output);
?>
