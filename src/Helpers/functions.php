<?php

function getStockStatus(int $quantity): string
{
    if ($quantity <= 0) {
        return 'Out of stock';
    } elseif ($quantity <= 5) {
        return 'Low stock';
    }

    return 'Available';
}

function formatSupplyName(string $name): string
{
    return strtoupper($name);
}

function getTotalQuantity(array $supplies): int
{
    return array_reduce($supplies, function ($carry, $supply) {
        return $carry + $supply['quantity'];
    }, 0);
}

function getAvailableSupplies(array $supplies): array
{
    return array_values(array_filter($supplies, function ($supply) {
        return $supply['quantity'] > 0;
    }));
}