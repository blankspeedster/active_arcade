using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ColissionWristA : MonoBehaviour
{   
    public GameObject checker, checker2, checker3;
    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    void OnCollisionEnter(Collision collision)
    {
        if(collision.collider.name == "colliderChecker")
        {
            int score = PlayerPrefs.GetInt("wristScore");
            score = score + 1;
            PlayerPrefs.SetInt("wristScore", score);
            checker.SetActive(false);
            Invoke("ShowChecker", 2.0f);
        }

        if(collision.collider.name == "colliderChecker2")
        {
            int score = PlayerPrefs.GetInt("wristScore");
            score = score + 1;
            PlayerPrefs.SetInt("wristScore", score);
            checker2.SetActive(false);
            Invoke("ShowChecker2", 2.0f);            
        }

        if(collision.collider.name == "colliderChecker3")
        {
            int score = PlayerPrefs.GetInt("wristScore");
            score = score + 1;
            PlayerPrefs.SetInt("wristScore", score);
            checker3.SetActive(false);
            Invoke("ShowChecker3", 2.0f);            
        }
    }

    void ShowChecker()
    {
        checker.SetActive(true);
    }

    void ShowChecker2()
    {
        checker2.SetActive(true);
    }

    void ShowChecker3()
    {
        checker3.SetActive(true);
    }

}
