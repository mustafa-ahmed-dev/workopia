<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use InvalidArgumentException;

use function Illuminate\Filesystem\join_paths;
use Illuminate\Support\Facades\Log;

class StorageHelper
{
    /**
     * Gets the path of a file stored in the storage.
     *
     * @param string $fileName The name of the file.
     * @param string $path A string representing the directory structure,
     *                     either as a single directory (e.g., "public")
     *                     or as multiple directories separated by forward slashes (e.g., "public/images/uploads").
     * @param bool $isPublic Whether the path is in the public storage (true) or private storage (false).
     * @throws \InvalidArgumentException If the file name or path is empty.
     * @return string The full path to the file.
     */
    public static function getPath(string $fileName, string $path, bool $isPublic = true): string
    {
        $basePath = $isPublic ? 'public' : 'private';

        // Ensure file name is not empty
        if (empty($fileName)) {
            throw new InvalidArgumentException('File name cannot be empty.');
        }

        // Ensure file name is not empty
        if (empty($path)) {
            throw new InvalidArgumentException('Path cannot be empty.');
        }

        // Split path into segments if it contains forward slashes, if the path is one directory it would make it an array of one element
        $splittedPath = explode('/', $path);
        $joinedPaths = join_paths(...$splittedPath);

        $storedFilePath = join_paths(storage_path(''), 'app', $basePath, $joinedPaths, $fileName);

        return $storedFilePath;
    }

    public static function deleteFile(string $path)
    {
        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
