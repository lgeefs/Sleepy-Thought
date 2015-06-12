//
//  FirstViewController.swift
//  SleepyThought
//
//  Created by Logan Geefs on 2015-04-04.
//  Copyright (c) 2015 Logan Geefs. All rights reserved.
//

import UIKit

class FirstViewController: UIViewController {

    
    @IBOutlet weak var myWebView: UIWebView! = UIWebView()
    
    
    
    override func viewDidLoad() {
        super.viewDidLoad()
        
        var url = NSURL(string: "http://sleepythought.com")
        
        myWebView.loadRequest(NSURLRequest(URL: url!))
        
    }


}

