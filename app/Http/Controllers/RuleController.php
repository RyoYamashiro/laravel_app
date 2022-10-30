<?php

namespace App\Http\Controllers;

use App\Services\RuleService;
use Illuminate\Http\Request;



class RuleController extends Controller
{
    private $rule_service;
    public function __construct(RuleService $rule_service)
    {
        $this->hoge = $rule_service;
    }
    
    public function index(RuleService $rule_service)
    {
        $rule_service->hoge('練習');
        return view('rule.index', compact('rule_service'));
    }
}