using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;
using UnityEngine.SceneManagement;

public class ElbowScript : MonoBehaviour
{

    public TMP_Text userName, timer, scoreText;
    private float timeRemaining;
    public GameObject timeUpPanel;

    int isStartingPointHit = 0;
    // Start is called before the first frame update
    void Start()
    {
        timeUpPanel.SetActive(false);
        string username = PlayerPrefs.GetString("username");
        userName.text = username;

        PlayerPrefs.SetInt("elbowScore", 0);

        int _ItimeRemaining = PlayerPrefs.GetInt("globalTimer");
        timeRemaining = (float)_ItimeRemaining;
    }

    // Update is called once per frame
    void Update()
    {
        isStartingPointHit = PlayerPrefs.GetInt("isStartingPointHit");        
        if(isStartingPointHit == 1){
            if (timeRemaining > 0)
            {
                timeRemaining -= Time.deltaTime;
                string _timeRemaining = timeRemaining.ToString("n2");
                timer.text = "Time: " + _timeRemaining;
            }
            else
            {
                timer.text = "Time: 0";
                timeUpPanel.SetActive(true);
            }

            int score = PlayerPrefs.GetInt("elbowScore");
            string _score = "Score: "+ score.ToString();
            scoreText.text = _score;
        }
    }

    //Go to Main Menu
    public void goToMainMenu()
    {
        SceneManager.LoadScene("MainMenuScene");
    }
}
