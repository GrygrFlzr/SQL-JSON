Assumed table structure:

```
+------+------------------+------------+
| P_Id | MinecraftVersion | ModVersion |
+------+------------------+------------+
|    1 | 1.5.2            | 1.3        |
|    2 | 1.5.2            | 1.31       |
+------+------------------+------------+
```

Note that P_Id is not required for the script to work.

JSON Structure:
```json
{
	"P_Id":"2",
	"MinecraftVersion":"1.5.2",
	"ModVersion":"1.31"
}
```

To use, request the api.php file with an *mcver* variable that indicates the version of Minecraft in use.

Example usage:
```
http://www.example.com/api.php?mcver=1.5.2
```

This variable is optional. If you omit the version, it will return the latest version of Minecraft supported.
