# Dashifen/Modcount

Sometimes it's handy to have a way to produce a sequence of numbers that repeats from zero to some number N.  Primarily, this is useful for accessing an array over and over again if you have the need to do so.

## Usage

```
$modcount = new Modcount(3);
echo $modcount->count();        // produces 0
echo $modcount->count();        // produces 1
echo $modcount->count();        // produces 2
echo $modcount->count();        // produces 0
echo $modcount->count();        // produces 1
```

You can also do all of that like this if you prefer:

```
$modcount = new Modcount(3);
echo $modcount();
echo $modcount();
echo $modcount();
```

## So, why would I use this?

It's entirely possible that no one other than Dash ever will.  That's okay, he loves it.  His primary need for it is the repetitious printing of HTML table cell `headers` attribute values in a loop:
 
```
$users = $database->getUsers();
$cols  = ["id", "name", "email", "phone"];
$modcount = new Modcount(sizeof($cols));

foreach($users as $user) {
    echo '<tr>';
    
    foreach($user as $datum) {
         echo sprintf('<td headers="%s">%s</td>',
            $cols[$modcount()],
            $datum);
    }
    
    echo '</tr>';
}
```

This is a poor example because using the loop index of that inner `foreach` loop would do the same thing, but more complicated situations can arise making this object handy.
