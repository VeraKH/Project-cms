// <?php 

// $errors = array();

// function FieldNameAsText ($fieldname) {
//     $fieldname = str_replace("_", " ", $fieldname);
//     $fieldname = ucfirst($fieldname);
//     return $fieldname;
// }

// function HasPresence($value) {
//     return isset($value) && $value !== "";
// }

// function ValidatePresence($fields_required){
//     global $errors;
//     foreach ($fields_required as $field) {
//         $value = trim($_POST[$field]);
//         if (!HasPresence($value)) {
//             $errors[$field] = FieldNameAsText($field) . " can't be blank";
//         }
//     }
// }

// function HasMaxLength($value, $max){
//     return (strlen($value) <= $max); 
// }

// function ValidateMaxLengths($fields_with_max_lengths){
//     global $errors; 
//     foreach ($fields_with_max_lengths as $field => $max) {
//         $value = trim($_POST[$field]);
//         if (!HasMaxLength($value, $max)) {
//             $errors[$field] = FieldNameAsText($field) . " is too long";
//         }
//     }
// }

// function SetInclusion ($value, $set) {
//     return (in_array($value, $set));
//   }

// ?>
