<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container6woguNx\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container6woguNx/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container6woguNx.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container6woguNx\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \Container6woguNx\srcApp_KernelDevDebugContainer([
    'container.build_hash' => '6woguNx',
    'container.build_id' => '0fa0bbbd',
    'container.build_time' => 1557820519,
], __DIR__.\DIRECTORY_SEPARATOR.'Container6woguNx');