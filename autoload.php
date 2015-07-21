<?php
spl_autoload_register(function ($class) {
  // The package namespace.
  $ns = 'Challonge';
  // What prefixes should be recognized?
  $prefixes = array(
    "{$ns}\\" => array(
      __DIR__ . '/src',
    ),
  );
  // Go through the prefixes.
  foreach ($prefixes as $prefix => $dirs) {
    // Does the requested class match the namespace prefix?
    $prefix_len = strlen($prefix);
    if (substr($class, 0, $prefix_len) !== $prefix) {
      continue;
    }
    // Strip the prefix off the class.
    $class = substr($class, $prefix_len);
    // A partial filename.
    $part = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    // Go through the directories to find classes.
    foreach ($dirs as $dir) {
      $dir = str_replace('/', DIRECTORY_SEPARATOR, $dir);
      $file = $dir . DIRECTORY_SEPARATOR . $part;
      if (is_readable($file)) {
        require $file;
        return;
      }
    }
  }
});
